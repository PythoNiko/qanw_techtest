@extends('layout')

@section('title')
    | Home
@endsection

@section('content')
    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-md-12">
                <h1>Developer Technical Assessment</h1>

                <h4>Reason</h4>
                <p>This is a task to test your knowledge and approaches around the following languages: PHP,
                    MySQL & JavaScript. You are free to use whichever third-party libraries out with the original
                    request in order to display the data in whichever way you deem appropriate.
                </p>

                <h4>Request</h4>
                <p>To use Laravel as the primary framework, but if you are struggling then use what you are most
                    comfortable with and you can learn as you go if you are successful. When implementing the API
                    connection feel free to use a third-party tool to aid this.
                </p>

                <ul>
                    <li>To implement a connection to the test API </li>
                    <ul>
                        <li>https://jsonplaceholder.typicode.com/</li>
                        <li>Grab and store the user’s data and the albums data that is available, store this in a
                            means that you see appropriate. These could be related, and you can see that from the
                            responses returned.</li>
                    </ul>
                    <li>Implement a UI to display the following options:</li>
                    <ul>
                        <li>A list of all albums.</li>
                        <li>A list of all users.</li>
                        <li>A page to view a single album.</li>
                        <li>A page to view a single user.</li>
                    </ul>
                    <li>There should be the functionality to edit a user’s details, no authentication is required
                        in order to do so.
                    </li>
                    <ul>
                        <li>The edit form should provide suitable validation to retain data integrity.</li>
                    </ul>
                    <li>The UI should be mobile responsive in order to fulfil the requirement of cross platform access,
                        if you are not comfortable on this or do not have a great deal of knowledge on it then do not
                        worry about it too much, it is purely to get a gauge of frontend skills.
                    </li>
                    <li>Your code should then be stored in a repository of your choice and publicly accessible
                        for our developers to review.
                    </li>
                </ul>

                <h4>Support</h4>
                <p>Please feel free to get in touch if you have any further questions on this task.</p>
                <p>List of albums endpoint: https://jsonplaceholder.typicode.com/albums</p>
                <p>List of user’s endpoint: https://jsonplaceholder.typicode.com/users</p>
            </div>
        </div>
    </div>
@endsection
