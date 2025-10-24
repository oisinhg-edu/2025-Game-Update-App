<footer class="bg-gray-900 dark:bg-gray-300 text-gray-300 dark:text-gray-900 py-8 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Column 1 -->
            <div>
                <h3 class="text-lg font-semibold mb-3">About</h3>
                <p class="sm:text-lg md:text-sm ">
                    Game DB CRUD Application built with Laravel & Tailwind CSS.
                </p>
            </div>

            <!-- Column 2 -->
            <div>
                <h3 class="text-lg font-semibold mb-3">Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('welcome') }}" class="hover:text-indigo-400 dark:hover:text-indigo-600">Home</a></li>
                    <li><a href="{{ route('games.index') }}"
                            class="hover:text-indigo-400 dark:hover:text-indigo-600">Games</a></li>
                    @auth
                        <li><a href="{{ route('games.create') }}" class="hover:text-indigo-400 dark:hover:text-indigo-600">Add
                                New Game</a></li>
                        <li><a href="{{ route('profile.edit') }}"
                                class="hover:text-indigo-400 dark:hover:text-indigo-600">Profile</a></li>
                    @endauth
                </ul>
            </div>

            <!-- Column 3 -->
            <div>
                <h3 class="text-lg font-semibold mb-3">Socials</h3>
                <div class="flex space-x-4">
                    <!-- Github Logo -->
                    <a href="https://github.com/oisinhg-edu"
                        class="hover:fill-indigo-400 dark:hover:fill-indigo-600 fill-gray-300 dark:fill-gray-800">
                        <svg width="40" height="40" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M48.854 0C21.839 0 0 22 0 49.217c0 21.756 13.993 40.172 33.405 46.69 2.427.49 3.316-1.059 3.316-2.362 0-1.141-.08-5.052-.08-9.127-13.59 2.934-16.42-5.867-16.42-5.867-2.184-5.704-5.42-7.17-5.42-7.17-4.448-3.015.324-3.015.324-3.015 4.934.326 7.523 5.052 7.523 5.052 4.367 7.496 11.404 5.378 14.235 4.074.404-3.178 1.699-5.378 3.074-6.6-10.839-1.141-22.243-5.378-22.243-24.283 0-5.378 1.94-9.778 5.014-13.2-.485-1.222-2.184-6.275.486-13.038 0 0 4.125-1.304 13.426 5.052a46.97 46.97 0 0 1 12.214-1.63c4.125 0 8.33.571 12.213 1.63 9.302-6.356 13.427-5.052 13.427-5.052 2.67 6.763.97 11.816.485 13.038 3.155 3.422 5.015 7.822 5.015 13.2 0 18.905-11.404 23.06-22.324 24.283 1.78 1.548 3.316 4.481 3.316 9.126 0 6.6-.08 11.897-.08 13.526 0 1.304.89 2.853 3.316 2.364 19.412-6.52 33.405-24.935 33.405-46.691C97.707 22 75.788 0 48.854 0z" />
                        </svg>
                    </a>

                    <!-- Youtube Logo -->
                    <a href="https://www.youtube.com/@froge_"
                        class="hover:fill-indigo-400 dark:hover:fill-indigo-600 fill-gray-300 dark:fill-gray-800">
                        <svg width="40" height="40" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8.16 12.676V7.323L12.863 10 8.16 12.676zm10.464-7.037a2.26 2.26 0 0 0-1.592-1.602C15.628 3.659 10 3.659 10 3.659s-5.628 0-7.032.378a2.261 2.261 0 0 0-1.591 1.602C1 7.052 1 9.999 1 9.999s0 2.948.377 4.36c.207.78.817 1.394 1.59 1.603 1.405.38 7.033.38 7.033.38s5.628 0 7.032-.38a2.262 2.262 0 0 0 1.592-1.602C19 12.947 19 10 19 10s0-2.948-.376-4.361z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-4 text-center text-sm">
            © {{ date('Y') }} My Laravel App. All rights reserved.
        </div>
    </div>
</footer>
