<table>
    <thead>
        <tr>
            <th>#</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Age</th>
            <th>Name of Guardian</th>
            <th>Relationship with guardian</th>
            <th>Email</th>
            <th>Address Line 1</th>
            <th>Address Line 2</th>
            <th>Post</th>
            <th>State</th>
            <th>Country</th>
            <th>Address in India</th>
            <th>Phone</th>
            <th>Phone 2</th>
            <th>Whatsapp number</th>
            <th>Time preference</th>
            <th>Learnt Malayalam</th>
            <th>Know about Aksharam</th>
            <th>Date applied</th>
            <th>Last modified</th>
        </tr>
    </thead>
    <tbody>
        @if ($applications && count($applications))
            @foreach ($applications as $key => $application)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $application->first_name }}</td>
                <td>{{ $application->last_name }}</td>
                <td>{{ $application->gender }}</td>
                <td>{{ $application->dob }}</td>
                <td>{{ $application->age ?: $application->getAge() }}</td>
                <td>{{ $application->name_of_guardian }}</td>
                <td>{{ $application->relationship_with_guardian }}</td>
                <td>{{ $application->email }}</td>
                <td>{{ $application->address_line1 }}</td>
                <td>{{ $application->address_line2 }}</td>
                <td>{{ $application->post }}</td>
                <td>{{ $application->state }}</td>
                <td>{{ $application->country }}</td>
                <td>{{ $application->address_in_india }}</td>
                <td>{{ $application->phone }}</td>
                <td>{{ $application->phone2 }}</td>
                <td>{{ $application->whatsapp_number }}</td>
                <td>{{ $application->getTimePreference() }}</td>
                <td>{{ $application->learnt_malayalam_before ? 'Yes' : 'No' }}</td>
                <td>{{ $application->know_about_aksharam }}</td>
                <td>{{ $application->created_at->format('d F, Y g:i A') }}</td>
                <td>{{ optional($application->updated_at)->format('d F, Y g:i A') }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="21">No applications found!</td>
            </tr>
        @endif
    </tbody>
</table>