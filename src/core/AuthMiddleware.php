<?php

class AuthMiddleware
{
    public static function requireAuth()
    {
        if (!isset($_SESSION['user_id'])) {
            Message::setFlash('error', 'Gagal!', 'Anda harus login terlebih dahulu.');
            header('Location: /login');
            exit;
        }
    }

    public static function requireRole($role)
    {
        self::requireAuth(); // Pastikan pengguna sudah login

        if ($_SESSION['role'] !== $role) {
            Message::setFlash('error', 'Akses Ditolak!', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            header('Location: /'); // Redirect ke halaman yang diizinkan
            exit;
        }
    }
}
