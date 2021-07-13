<h1>American Labor Company - New Worker Submission</h1>

<p>A potential worker lead just submitted their information into the ALC website. See contact information below</p>

<br/>

<h3>Contact Information</h3>

@isset($worker['worker_lead'])
    <p>Name: {{ $worker['worker_lead']->fname }} {{ $worker['worker_lead']->lname }}</p>
    <p>Email: {{ $worker['worker_lead']->email }}</p>
    <p>Phone: {{ $worker['worker_lead']->phone }}</p>
    <p>Trade: {{ $worker['worker_lead']->trade ?? "Not Specified" }}</p>
    <p>Additional Notes: {{ $worker['worker_lead']->info }}</p>
@endisset

@isset($worker['document'])
    <p>Link to Resume: <a href="voca.americanlaborcompany.com/file/{{ $worker['document']->hash_name }}">Resume link on Voca!</a></p>
@endisset
