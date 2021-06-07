@props(['user'])
<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="/images/logo-utb.jpg" alt="UTB LOGO" width="300" height="32">
        </a>
    </div>

    <div class="mt-8 md:mt-0">
        @if(is_null($user))
            <a href="/register" class="bg-yellow-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Registrovat se
            </a>
            <a href="/login" class="bg-yellow-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Přihlásit se
            </a>
        @endif

        <a href="/" class="bg-yellow-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Domovská stránka
        </a>

        @if(!is_null($user))
                <a class="bg-blue-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Přihlášen : {{$user->username}}
                </a>
                @if($user->isAdmin)
                    <a href="/admin/posts" class="bg-yellow-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        Admin
                    </a>
                @endif

                @if(!$user->isAdmin)
                    <a href="/admin/posts/create" class="bg-yellow-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        Nový příspěvek
                    </a>
                @endif

                <a href="/logout" class="bg-yellow-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Odhlásit se
                </a>
        @endif




    </div>
</nav>
