<x-app-layout>

    <div style="padding:18px 14px; width:95%; margin:auto;">

        <div style="display:flex;justify-content:space-between;   margin-bottom:17px;">

            <h1>
                Short urls
            </h1>

            <a href="{{ route('short-urls.create') }}">

                <button>
                    Create short url
                </button>

            </a>

        </div>


        @if(session('success'))

            <div style="border:1px   green; padding:9px;  margin-bottom :14px;">

                {{ session('success') }}
            </div>

        @endif



        <div style="border:1px solid #ccc;  padding:12px 10px;  overflow:auto;">

            <table border="1" cellpadding="10" cellspacing="0" width="100%">

                <thead>

                    <tr>

                        <th>
                            orignial url
                        </th>
                        <th>
                            short code
                        </th>
                        <th>
                            short url
                        </th>
                        <th>
                            creator
                        </th>

                    </tr>
                </thead>


                <tbody>

                    @forelse($shortUrls as $shortUrl)

                        <tr>

                            <td>
                                <a
                                    href="{{ $shortUrl->original_url }}"
                                    target="_blank"
                                >

                                    {{ $shortUrl->original_url }}

                                </a>

                            </td>
                            <td>

                                {{ $shortUrl->short_code }}

                            </td>


                            <td>
                                {{ url('/') }}/{{ $shortUrl->short_code }}

                            </td>


                            <td>
                                {{ $shortUrl->user->name }}

                                <br>

                                {{ $shortUrl->user->role->name }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4">

                                No Short URLs Found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>,,

        </div>

    </div>

</x-app-layout>