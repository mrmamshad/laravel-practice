<x-layout>
    <x-slot:heading>All jobs are listed here</x-slot:heading>

    <ul>
        @foreach($jobs as $job)
            <li>
                <a href="/jobs/{{$job['id']}}"  class="text-blue-500 text-bold "  >
                <strong>{{$job['title']}}:</strong> pays {{$job['income']}} per month
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
