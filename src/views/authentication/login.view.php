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
                <h1 class="text-3xl font-semibold">Login</h1>
                <!-- <p class="text-sm">Sign in to access your account</p> -->
            </div>
            <form action="/login" method="POST">
                <div class="form-group">
                    <div class="form-field">
                        <label for="identifier" class="form-label">Username / No HP / Email:</label>
                        <input placeholder="Type here" type="text" class="input max-w-full" id="identifier" name="identifier" />
                        <!-- <label class="form-label">
                        <span class="form-label-alt">Please enter a valid email.</span>
                    </label> -->
                    </div>
                    <div class="form-field">
                        <label for="password" class="form-label">Password:</label>
                        <div class="form-control">
                            <input placeholder="Type here" type="password" class="input max-w-full" id="password" name="password" />
                        </div>
                    </div>
                    <div class="form-field">
                        <div class="form-control justify-start">
                            <div class="flex gap-2">
                                <input type="checkbox" class="checkbox" id="remember" name="remember" />
                                <label for="remember">Remember me</label>
                                <!-- <a href="#"> me</a> -->
                            </div>
                            <!-- <label class="form-label">
                            <a class="link link-underline-hover link-primary text-sm">Forgot your password?</a>
                        </label> -->
                        </div>
                    </div>
                    <div class="form-field pt-5">
                        <div class="form-control justify-between">
                            <button type="submit" class="btn btn-primary w-full">Login</button>
                        </div>
                    </div>

                    <div class="form-field">
                        <div class="form-control justify-center">
                            <a class="link link-underline-hover link-primary text-sm" href="/register">Belum punya akun? Register</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>