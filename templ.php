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

    <!-- SIDEBAR: START -->
    <div class="flex flex-row sm:gap-10">
        <div class="sm:w-full sm:max-w-[18rem]">
            <input type="checkbox" id="sidebar-mobile-fixed" class="sidebar-state" />
            <label for="sidebar-mobile-fixed" class="sidebar-overlay"></label>
            <aside class="sidebar sidebar-fixed-left sidebar-mobile h-full justify-start max-sm:fixed max-sm:-translate-x-full">
                <section class="sidebar-title items-center p-4">
                    <svg fill="none" height="42" viewBox="0 0 32 32" width="42" xmlns="http://www.w3.org/2000/svg">
                        <rect height="100%" rx="16" width="100%"></rect>
                        <path clip-rule="evenodd" d="M17.6482 10.1305L15.8785 7.02583L7.02979 22.5499H10.5278L17.6482 10.1305ZM19.8798 14.0457L18.11 17.1983L19.394 19.4511H16.8453L15.1056 22.5499H24.7272L19.8798 14.0457Z" fill="currentColor" fill-rule="evenodd"></path>
                    </svg>
                    <div class="flex flex-col">
                        <span>Dashboard Kasir</span>
                        <span class="text-xs font-normal text-content2">Staff</span>
                    </div>
                </section>
                <section class="sidebar-content">
                    <nav class="menu rounded-md">
                        <section class="menu-section px-4">
                            <span class="menu-title">Main menu</span>
                            <ul class="menu-items">
                                <li class="menu-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>General</span>
                                </li>

                                <li class="menu-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="opacity-75" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 10l5 -6l5 6"></path>
                                        <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                                        <path d="M12 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    </svg>
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg> -->
                                    <span>Barang</span>
                                </li>
                                <!-- <li class="menu-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                    <span>Transaksi</span>
                                </li> -->
                                <li>
                                    <input type="checkbox" id="menu-2" class="menu-toggle" />
                                    <label class="menu-item justify-between menu-active" for="menu-2">
                                        <div class="flex gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                            <span>Transaksi</span>
                                        </div>

                                        <span class="menu-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </label>

                                    <div class="menu-item-collapse">
                                        <div class="min-h-0">
                                            <label class="menu-item ml-6">Transaksi</label>
                                            <label class="menu-item ml-6">List Transaksi</label>
                                            <label class="menu-item ml-6">Change Password</label>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <input type="checkbox" id="menu-1" class="menu-toggle" />
                                    <label class="menu-item justify-between" for="menu-1">
                                        <div class="flex gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="opacity-75" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path>
                                                <path d="M9 7l4 0"></path>
                                                <path d="M9 11l4 0"></path>
                                            </svg>
                                            <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg> -->
                                            <span>Laporan</span>
                                        </div>

                                        <span class="menu-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </label>

                                    <div class="menu-item-collapse">
                                        <div class="min-h-0">
                                            <label class="menu-item ml-6">Change Email</label>
                                            <label class="menu-item ml-6">Profile</label>
                                            <label class="menu-item ml-6">Change Password</label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </section>
                        <!-- <div class="divider my-0"></div>
                        <section class="menu-section px-4">
                            <span class="menu-title">Settings</span>
                            <ul class="menu-items">
                                <li class="menu-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="opacity-75" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 21l18 0"></path>
                                        <path d="M3 10l18 0"></path>
                                        <path d="M5 6l7 -3l7 3"></path>
                                        <path d="M4 10l0 11"></path>
                                        <path d="M20 10l0 11"></path>
                                        <path d="M8 14l0 3"></path>
                                        <path d="M12 14l0 3"></path>
                                        <path d="M16 14l0 3"></path>
                                    </svg>
                                    Payments
                                </li>
                                <li class="menu-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="opacity-75" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                                    </svg>
                                    Balances
                                </li>
                                <li class="menu-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="opacity-75" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                    </svg>
                                    Customers
                                </li>
                                <li class="menu-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="opacity-75" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 10l5 -6l5 6"></path>
                                        <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                                        <path d="M12 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    </svg>
                                    Products
                                </li>
                                <li>
                                    <input type="checkbox" id="menu-3" class="menu-toggle" />
                                    <label class="menu-item justify-between" for="menu-3">
                                        <div class="flex gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="opacity-75" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path>
                                                <path d="M9 7l4 0"></path>
                                                <path d="M9 11l4 0"></path>
                                            </svg>
                                            <span>Contracts</span>
                                        </div>

                                        <span class="menu-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </label>

                                    <div class="menu-item-collapse">
                                        <div class="min-h-0">
                                            <label class="menu-item menu-item-disabled ml-6">Create contract</label>
                                            <label class="menu-item ml-6">All contracts</label>
                                            <label class="menu-item ml-6">Pending contracts</label>
                                            <label class="menu-item ml-6">Security</label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </section> -->
                    </nav>
                </section>
                <section class="sidebar-footer justify-end bg-gray-2 pt-2">
                    <div class="divider my-0"></div>
                    <div class="dropdown z-50 flex h-fit w-full cursor-pointer hover:bg-gray-4">
                        <label class="whites mx-2 flex h-fit w-full cursor-pointer p-0 hover:bg-gray-4" tabindex="0">
                            <div class="flex flex-row gap-4 p-4">
                                <div class="avatar-square avatar avatar-md">
                                    <img src="https://i.pravatar.cc/150?img=30" alt="avatar" />
                                </div>

                                <div class="flex flex-col">
                                    <span>Sandra Marx</span>
                                    <span class="text-xs font-normal text-content2">sandra</span>
                                </div>
                            </div>
                        </label>
                        <div class="dropdown-menu-right-top dropdown-menu ml-2">
                            <a class="dropdown-item text-sm">Profile</a>
                            <a tabindex="-1" class="dropdown-item text-sm">Account settings</a>
                            <a tabindex="-1" class="dropdown-item text-sm">Change email</a>
                            <a tabindex="-1" class="dropdown-item text-sm">Subscriptions</a>
                            <a tabindex="-1" class="dropdown-item text-sm">Change password</a>
                            <a tabindex="-1" class="dropdown-item text-sm">Refer a friend</a>
                            <a tabindex="-1" class="dropdown-item text-sm">Settings</a>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
        <div class="flex w-full flex-col p-4">
            <div class="w-fit">
                <label for="sidebar-mobile-fixed" class="btn-primary btn sm:hidden">Open Sidebar</label>
            </div>

            <div class="navbar">
                <div class="navbar-start">
                    <div class="breadcrumbs text-sm">
                        <ul>
                            <li><a>Main Menu</a></li>
                            <li><a>Transaksi</a></li>
                            <li>Transaksi</li>
                        </ul>
                    </div>
                </div>

                <div class="navbar-end flex items-center space-x-4">
                    <!-- Date and Time -->
                    <span class="navbar-item">
                        <span id="currentDateTime"></span>
                    </span>
                </div>
            </div>


            <!-- MAIN CONTAINER: START -->
            <div class="container mx-auto p-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 flex flex-col items-center">
                        <img src="https://placehold.co/300x450" alt="Product Image" class="w-full h-48 object-cover rounded-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-gray-100">Product Name</h3>
                        <p class="text-gray-700 dark:text-gray-300">Price: $100</p>
                        <button class="btn btn-primary mt-4">+ Add to Cart</button>
                    </div>
                    <!-- Repeat for other cards -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 flex flex-col items-center">
                        <img src="https://placehold.co/300x450" alt="Product Image" class="w-full h-48 object-cover rounded-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-gray-100">Product Name</h3>
                        <p class="text-gray-700 dark:text-gray-300">Price: $100</p>
                        <button class="btn btn-primary mt-4">+ Add to Cart</button>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 flex flex-col items-center">
                        <img src="https://placehold.co/300x150" alt="Product Image" class="w-full h-48 object-cover rounded-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-gray-100">Product Name</h3>
                        <p class="text-gray-700 dark:text-gray-300">Price: $100</p>
                        <button class="btn btn-primary mt-4">+ Add to Cart</button>

                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 flex flex-col items-center">
                        <img src="https://placehold.co/500x500" alt="Product Image" class="w-full h-48 object-cover rounded-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-gray-100">Product Name</h3>
                        <p class="text-gray-700 dark:text-gray-300">Price: $100</p>
                        <button class="btn btn-primary mt-4">+ Add to Cart</button>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 flex flex-col items-center">
                        <img src="https://placehold.co/300x450" alt="Product Image" class="w-full h-48 object-cover rounded-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-gray-100">Product Name</h3>
                        <p class="text-gray-700 dark:text-gray-300">Price: $100</p>
                        <button class="btn btn-primary mt-4">+ Add to Cart</button>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 flex flex-col items-center">
                        <img src="https://placehold.co/300x150" alt="Product Image" class="w-full h-48 object-cover rounded-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-gray-100">Product Name</h3>
                        <p class="text-gray-700 dark:text-gray-300">Price: $100</p>
                        <button class="btn btn-primary mt-4">+ Add to Cart</button>

                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 flex flex-col items-center">
                        <img src="https://placehold.co/500x500" alt="Product Image" class="w-full h-48 object-cover rounded-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-gray-100">Product Name</h3>
                        <p class="text-gray-700 dark:text-gray-300">Price: $100</p>
                        <button class="btn btn-primary mt-4">+ Add to Cart</button>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 flex flex-col items-center">
                        <img src="https://placehold.co/500x500" alt="Product Image" class="w-full h-48 object-cover rounded-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-gray-100">Product Name</h3>
                        <p class="text-gray-700 dark:text-gray-300">Price: $100</p>
                        <button class="btn btn-primary mt-4">+ Add to Cart</button>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 flex flex-col items-center">
                        <img src="https://placehold.co/500x500" alt="Product Image" class="w-full h-48 object-cover rounded-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-gray-100">Product Name</h3>
                        <p class="text-gray-700 dark:text-gray-300">Price: $100</p>
                        <button class="btn btn-primary mt-4">+ Add to Cart</button>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 flex flex-col items-center">
                        <img src="https://placehold.co/500x500" alt="Product Image" class="w-full h-48 object-cover rounded-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-gray-100">Product Name</h3>
                        <p class="text-gray-700 dark:text-gray-300">Price: $100</p>
                        <button class="btn btn-primary mt-4">+ Add to Cart</button>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 flex flex-col items-center">
                        <img src="https://placehold.co/500x500" alt="Product Image" class="w-full h-48 object-cover rounded-lg">
                        <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-gray-100">Product Name</h3>
                        <p class="text-gray-700 dark:text-gray-300">Price: $100</p>
                        <button class="btn btn-primary mt-4">+ Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- <div class="my-4 grid grid-cols-4 gap-4"> -->


            <!-- <div class="card card-image-cover">
                    <img src="https://placehold.co/150x150" alt="" />
                    <div class="card-body">
                        <h2 class="card-header">Nama Produk</h2>
                        <p class="text-content2">....</p>
                        <div class="card-footer">
                            <button class="btn-secondary btn">+ Add Product</button>
                        </div>
                    </div>
                </div>

                <div class="card card-image-cover">
                    <img src="https://placehold.co/150x150" alt="" />
                    <div class="card-body">
                        <h2 class="card-header">Nama Produk</h2>
                        <p class="text-content2">....</p>
                        <div class="card-footer">
                            <button class="btn-secondary btn">+ Add Product</button>
                        </div>
                    </div>
                </div>

                <div class="card card-image-cover">
                    <img src="https://placehold.co/150x150" alt="" />
                    <div class="card-body">
                        <h2 class="card-header">Nama Produk</h2>
                        <p class="text-content2">....</p>
                        <div class="card-footer">
                            <button class="btn-secondary btn">+ Add Product</button>
                        </div>
                    </div>
                </div> -->
            <!-- 
                <div class="flex h-40 w-full items-center justify-center border-2 border-dashed border-border bg-gray-1">+</div>
                <div class="flex h-40 w-full items-center justify-center border-2 border-dashed border-border bg-gray-1">+</div>
                <div class="flex h-40 w-full items-center justify-center border-2 border-dashed border-border bg-gray-1">+</div>
                <div class="flex h-40 w-full items-center justify-center border-2 border-dashed border-border bg-gray-1">+</div>
                <div class="flex h-40 w-full items-center justify-center border-2 border-dashed border-border bg-gray-1">+</div>
                <div class="flex h-40 w-full items-center justify-center border-2 border-dashed border-border bg-gray-1">+</div>
                <div class="flex h-40 w-full items-center justify-center border-2 border-dashed border-border bg-gray-1">+</div>
                <div class="flex h-40 w-full items-center justify-center border-2 border-dashed border-border bg-gray-1">+</div>
                <div class="flex h-40 w-full items-center justify-center border-2 border-dashed border-border bg-gray-1">+</div>
                <div class="flex h-40 w-full items-center justify-center border-2 border-dashed border-border bg-gray-1">+</div> -->
            <!-- MAIN CONTAINER: END -->
            <!-- </div> -->
        </div>
    </div>
    <!-- SIDEBAR: END -->

    <script src="<?= BASEURL . '/js/script.js' ?>"></script>
</body>

</html>