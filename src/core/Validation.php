  <?php

  class Validation
  {
    const DEFAULT_VALIDATION_ERRORS = [
      'required' => 'Data %s harus diisi',
      'email' => ' %s email tidak valid',
      'min' => '%s harus lebih dari %d karakter',
      'max' => '%s harus kurang dari %d karakter',
      'between' => '%s harus diantara %d and %d karakter',
      'same' => '%s and %s tidak sama',
      'alphanumeric' => '%s harus diisi huruf dan angka',
      'secure' => '%s jumalah diantara 8 and 64 characters and ada angka, huruf besar, huruf kecil and dan karakter spesial',
      'unique' => '%s sudah ada',
      'uploaded' => '%s harus diupload',
      'mimes' => '%s harus berupa file dengan tipe: %s',
      'max_size' => '%s harus kurang dari %d bytes',
    ];

    public function validate(array $data, array $fields, array $messages = []): array
    {
      $split = fn($str, $sparator) => array_map('trim', explode($sparator, $str));
      $rule_messages = array_filter($messages, fn($massage) => is_string($massage));
      $validation_errors = array_merge(self::DEFAULT_VALIDATION_ERRORS, $rule_messages);
      $errors = [];
      foreach ($fields as $field => $option) {
        $rules = $split($option, '|');
        foreach ($rules as $rule) {
          $params = [];
          if (strpos($rule, ':')) {
            [$rule_name, $param_str] = $split($rule, ':');
            $params = $split($param_str, ',');
          } else {
            $rule_name = trim($rule);
          }

          $fn = 'is_' . $rule_name;
          if (method_exists(new Validation(), $fn)) {
            $pass = $this->$fn($data, $field, ...$params);
            if (!$pass) {
              array_push(
                $errors,
                sprintf(
                  $messages[$field][$rule_name] ?? $validation_errors[$rule_name],
                  str_replace("_", " ", $field),
                  ...$params
                )
              );
            }
          }
        }
      }
      return $errors;
    }

    public function is_required(array $data, string $field): bool
    {
      return isset($data[$field]) && $data[$field] !== '';
    }

    public function is_email(array $data, string $field): bool
    {
      if (empty($data[$field])) {
        return true;
      }

      return filter_var($data[$field], FILTER_VALIDATE_EMAIL);
    }

    public function is_min(array $data, string $field, int $min): bool
    {
      if (!isset($data[$field])) {
        return true;
      }

      return mb_strlen($data[$field]) >= $min;
    }

    public function is_max(array $data, string $field, int $max): bool
    {
      if (!isset($data[$field])) {
        return true;
      }
      return mb_strlen($data[$field]) <= $max;
    }

    public function is_between(array $data, string $field, int $min, int $max): bool
    {
      if (!isset($data[$field])) {
        return true;
      }
      $len = mb_strlen($data[$field]);
      return $len >= $min && $len <= $max;
    }

    public function is_same(array $data, string $field, string $other): bool
    {
      if (isset($data[$field], $data[$other])) {
        return $data[$field] === $data[$other];
      }

      if (!isset($data[$field]) && !isset($data[$other])) {
        return true;
      }

      return false;
    }

    public function is_alphanumeric(array $data, string $field): bool
    {
      if (!isset($data[$field])) {
        return true;
      }

      return ctype_alnum($data[$field]);
    }

    public function is_secure(array $data, string $field): bool
    {
      if (!isset($data[$field])) {
        return true;
      }
      $pattern = "#.*^(?=.{8,64})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";
      return preg_match($pattern, $data[$field]);
    }

    public function is_unique(array $data, string $field, string $table, string $column): bool
    {
      if (!isset($data[$field])) {
        return true;
      }
      // disini cek ke database
      return false;
    }

    public function is_uploaded(array $data, string $field): bool
    {
      return isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK;
    }


    public function is_mimes(array $data, string $field, string ...$allowedExtensions): bool
    {
      if (!isset($_FILES[$field])) {
        return false;
      }

      $fileName = $_FILES[$field]['name'];
      $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

      return in_array($fileExt, $allowedExtensions);
    }

    public function is_max_size(array $data, string $field, int $maxSize): bool
    {
      if (!isset($_FILES[$field])) {
        return false;
      }

      $fileSize = $_FILES[$field]['size'];

      return $fileSize <= $maxSize;
    }
  }
