<!Doctype HTML>
<html lang="en-us">
<head>
    <meta charset="urf-8">
    <title>
      Projects
    </title>
</head>
<body>
<h1>Projects</h1>
<ul>
@foreach($projects as $project)
<li>
    <a href="/projects/{{$project->id}}">
        {{$project->title}}
    </a>
</li>
    @endforeach
</ul>
</body>
</html>