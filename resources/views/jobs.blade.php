<x-layout>
    <x-slot:heading>All jobs are listed here</x-slot:heading>

    <ul>
        @foreach($jobs as $job)
            <li>
                <a href="/jobs/{{$job['id']}}" >
                <strong>{{$job['title']}}:</strong> pays {{$job['income']}} per month
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
