<x-layout>
    <x-slot:heading>All jobs are listed here</x-slot:heading>

    <ul>
        @foreach($jobs as $job)
            <li>
                <a href="/jobs/" ></a>
                <strong>{{$job['title']}}:</strong> pays {{$job['income']}} per month
            </li>
        @endforeach
    </ul>
</x-layout>
