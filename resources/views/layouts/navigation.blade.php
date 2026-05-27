<nav style="padding:15px; border-bottom:1px solid #ccc;">

    <a href="{{ route('dashboard') }}">
        Dashboard
    </a>

    |

    <a href="{{ route('profile.edit') }}">
        Profile
    </a>

    |

    <span>
        {{ Auth::user()->name }}
    </span>

    |

    <form
        method="POST"
        action="{{ route('logout') }}"
        style="display:inline;"
    >

        @csrf

        <button>
            Logout
        </button>

    </form>

</nav>