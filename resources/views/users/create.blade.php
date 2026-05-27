<x-app-layout>

    <div style="padding:20px; width:400px;">

        <h1>Create User </h1>

        <br>
        @if(session('error'))
            <div>
                {{ session('error') }}
            </div>
            <br>

        @endif


        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div style="margin-bottom:15px;">

                <label> Name </label>

                <br>

                <input
                    type="text"
                    name="name"
                    style="width:100%;">

            </div>


            <div style="margin-bottom:15px;">

                <label> Email</label>

                <br>
                <input
                    type="email"
                    name="email"
                    style="width:100%;"
                >

            </div>


            <div style="margin-bottom:15px;">
                <label>
                    Password
                </label>

                <br>

                <input
                    type="password"
                    name="password"
                    style="width:100%;">

            </div>


            <div style="margin-bottom:15px;">

                <label>
                    Company
                </label>
                <br>

                <select
                    name="company_id"
                    style="width:100%;"
                >

                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">

                            {{ $company->name }}

                        </option>
                    @endforeach

                </select>

            </div>

            <div style="margin-bottom:15px;">

                <label>
                    Role
                </label>

                <br>

                <select
                    name="role_id"
                    style="width:100%;"
                >

              @foreach($roles as $role)

                        <option value="{{ $role->id }}">

                            {{ $role->name }}
                        </option>

                    @endforeach

   </select>

            </div>

            <button>
                Create User
            </button>
        </form>

    </div>

</x-app-layout>