<h1>American Labor Company - New Worker Submission</h1>

<p>A potential worker lead just submitted their information into the ALC website. See contact information below</p>

<br/>

<h3>Contact Information</h3>

@isset($worker['user'])
    <p>Name: {{ $worker['user']->name }}</p>
    <p>Email: {{ $worker['user']->email }}</p>
    <p>Phone: {{ $worker['user']->phone }}</p>
    <p>Trade: {{ $worker['user']->trade ?? "Not Specified" }}</p>
    <p>Additional Notes: {{ $worker['user']->info }}</p>
@endisset

@isset($worker['document'])
    <p>Link to Resume: <a href="voca.americanlaborcompany.com/file/{{ $worker['document']->hash_name }}">Resume link on Voca!</a></p>
@endisset