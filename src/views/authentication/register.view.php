<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/rippleui@1.12.1/dist/css/styles.css" />
    <link rel="stylesheet" href="<?= BASEURL . '/css/style.css' ?>" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="bg-blue-1 rounded-xl">
        <div class="mx-auto flex w-full max-w-sm flex-col gap-6">
            <div class="flex flex-col items-center">
                <h1 class="text-3xl font-semibold">Register</h1>
                <!-- <p class="text-sm">Sign in to access your account</p> -->
            </div>
            <form action="/register" method="POST">
                <div class="form-group">
                    <div class="form-field">
                        <label for="nama" class="form-label">Nama Lengkap: </label>

                        <input placeholder="Type here" type="text" class="input max-w-full" id="nama" name="nama" />
                        <!-- <label class="form-label">
                            <span class="form-label-alt">Please enter a valid email.</span>
                        </label> -->
                    </div>
                    <div class="form-field">
                        <label for="no_hp" class="form-label">No Handphone: </label>

                        <input placeholder="Type here" type="number" class="input max-w-full" id="no_hp" name="no_hp" />
                        <!-- <label class="form-label">
                            <span class="form-label-alt">Please enter a valid email.</span>
                    </label> -->
                    </div>
                    <div class="form-field">
                        <label for="email" class="form-label">Email address</label>

                        <input placeholder="Type here" type="email" class="input max-w-full" id="email" name="email" />
                        <!-- <label class="form-label">
                        <span class="form-label-alt">Please enter a valid email.</span>
                    </label> -->
                    </div>
                    <div class="form-field">
                        <label for="username" class="form-label">Username: </label>

                        <input placeholder="Type here" type="text" class="input max-w-full" id="username" name="username" />
                        <!-- <label class="form-label">
                        <span class="form-label-alt">Please enter a valid email.</span>
                    </label> -->
                    </div>
                    <div class="form-field">
                        <label for="password" class="form-label">Password</label>
                        <div class="form-control">
                            <input placeholder="Type here" type="password" class="input max-w-full" id="password" name="password" />
                        </div>
                    </div>
                    <div class="form-field">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <div class="form-control">
                            <input placeholder="Type here" type="password" class="input max-w-full" id="confirm_password" name="confirm_password" />
                        </div>
                    </div>
                    <div class="form-field pt-5">
                        <div class="form-control justify-between">
                            <button type="submit" class="btn btn-primary w-full">Sign in</button>
                        </div>
                    </div>

                    <div class="form-field">
                        <div class="form-control justify-center">
                            <a class="link link-underline-hover link-primary text-sm" href="/login">Sudah punya akun? Login</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>