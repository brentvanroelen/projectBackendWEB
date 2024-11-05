<h2>Proficiat je maakt deel uit van deze leuke community:</h2>


<p>Momenteel zijn we nogbezig met het maken van de site maar binnenkort kan je films gaan opzoekenen toevoegen.</p>

<button> <a href = "{{ route ('welcome')}}" class="btn btn-primary" >Welcome page </a> </button>
<button> <a href = "{{ route ('profile')}}" class="btn btn-primary" >Profile </a> </button>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Log Out</button>
</form>

