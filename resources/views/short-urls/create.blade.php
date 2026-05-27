<x-app-layout>

    <div style="width:420px; padding:18px 11px;    margin:12px auto;">

        <div style=" border:1px solid #ccc; padding:16px 13px;">
            <h1 style="margin-bottom:18px;">
                Create Short URL
            </h1>
            <form method="POST" action="{{ route('short-urls.store') }}">

                @csrf
                <div style=" margin-bottom:14px;">
                    <label style="display:block;  margin-bottom: 6px;">
                        Orignal url
                    </label>
                    <input
                        type="url"
                        name="original_url"
                        required
                        style="width:100%; padding:5px;"
                    >
                </div>

                <button type="submit">

                    Create url
                </button>
            </form>

        </div> </div>
</x-app-layout>