<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>

    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="flex flex-col items-center justify-center">
            <div class=" w-full">
                <header class="flex flex-col items-end justify-between bg-blue-400">
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end p-4">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                        </Link>
                        <template v-else>
                            <div class="flex flex-row gap-4 mr-4">
                                <Link :href="route('login')"
                                    class="bg-slate-100 rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Log in
                                </Link>

                                <Link v-if="canRegister" :href="route('register')"
                                    class="bg-slate-100 rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Register
                                </Link>
                            </div>
                        </template>
                    </nav>
                </header>
                <main class="h-screen bg-slate-200">
                    <h1 class="text-2xl text-black font-bold">This is the home page main content</h1>
                    {{ $page.props }}
                </main>
            </div>
        </div>
    </div>
    <footer class="py-16 text-center text-sm text-black dark:text-white/70 bg-blue-400">
        Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
    </footer>
</template>
