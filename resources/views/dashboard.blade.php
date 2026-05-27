<x-app-layout>

    <x-slot name="header">

        <div style="display:flex;justify-content:space-between; margin:18px 3px;">

            <h2>
                Dashboard
            </h2>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                        <button>
                            Logout
                        </button>

                </form>

        </div>

    </x-slot>


    <div style="padding:17px 20px;">


        <div style="border:1px solid red;padding:14px 20px; margin-bottom:34px;">

                <h1>
                    Welcome {{ auth()->user()->name }}
                </h1>

            <p>
                    <b>Email :</b>
                {{ auth()->user()->email }}
            </p>

                <p>
                    <b>Role :</b>
                {{ auth()->user()->role->name }}
            </p>

            <p>
                    <b>Company :</b>
                {{ auth()->user()->company->name ?? 'No Company' }}
            </p>

        </div>



        <div style="border:1px solid red; padding:18px 12px; margin-top:7px;">

            <h2>
                Quick Links
            </h2>

            <div style="display:flex; gap:11px; margin-top:14px;">

                    <a href="{{ route('users.create') }}">

                        <button>
                            Create user
                        </button>

                    </a>


                <a href="{{ route('short-urls.create') }}">

                        <button>
                            create shorturl
                        </button>

                </a>


                    <a href="{{ route('short-urls.index') }}">

                        <button>
                            view urls
                        </button>

                    </a>


                    <a href="{{ route('profile.edit') }}">

                        <button>
                            edit profile
                        </button>

                    </a>

            </div>

        </div>

    </div>

</x-app-layout>