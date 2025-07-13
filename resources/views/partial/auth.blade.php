<!-- Auth Modal -->
<div id="auth-modal" class="fixed inset-0 z-50 hidden">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-opacity-30 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md overflow-hidden">
            <!-- Close Button -->
            <button id="close-auth-modal" class="absolute top-4 right-4 text-gray-500 hover:text-orange-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Tabs -->
            <div class="border-b border-gray-200">
                <div class="flex">
                    <button id="login-tab"
                        class="flex-1 py-4 px-6 text-center font-medium text-orange-600 border-b-2 border-orange-600">
                        Login
                    </button>
                    <button id="register-tab"
                        class="flex-1 py-4 px-6 text-center font-medium text-gray-500 hover:text-gray-700">
                        Register
                    </button>
                </div>
            </div>

            <!-- Tab Contents -->
            <div class="p-6">
                <!-- Login Form -->
                <form id="login-form" action="/login-user" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="login-email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="login-email" name="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                            required>
                    </div>
                    <div>
                        <label for="login-password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="login-password" name="password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                            required>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox"
                                class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                        </div>
                        <div class="text-sm">
                            <a href="#" class="font-medium text-orange-600 hover:text-orange-500">Forgot password?</a>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                        Sign in
                    </button>
                </form>

                <!-- Register Form (hidden by default) -->
                <form id="register-form" action="/register-user" method="POST" class="hidden space-y-4">
                    @csrf
                    <div>
                        <label for="register-name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="register-name" name="name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                            required>
                    </div>
                    <div>
                        <label for="register-email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="register-email" name="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                            required>
                    </div>
                    <div>
                        <label for="register-password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="register-password" name="password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                            required>
                    </div>
                    <div>
                        <label for="register-confirm-password" class="block text-sm font-medium text-gray-700">Confirm
                            Password</label>
                        <input type="password" id="register-confirm-password" name="password_confirmation"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                            required>
                    </div>
                    <div>
                        <label for="register-role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select id="register-role" name="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                        Register
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>