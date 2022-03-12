<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">
                        Add Task
                    </div>
                    <div class="card-body">
                       <form class="row g-3" method="post" action="{{url('/save')}}">
                           {{csrf_field()}}
                        <div class="col-12">
                            <label for="title">Task Title</label>
                            <input type="text" class="form-control" id="title" value="" name="title">
                        </div>
                        <div class="col-6">
                            <label for="date">DeadLine Date</label>
                            <input type="date" class="form-control" id="date" value="" name="date">
                        </div>
                        <div class="col-6">
                            <label for="time">DeadLine Time</label>
                            <input type="time" class="form-control" id="time" value="" name="time">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mb-3">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <form method="get" action="">
                            <label>Select Time Zone</label>
                            <select class="form-select" aria-label="Default select example" name="timezone">
                                @foreach($timezones as $timezone)
                                    <option value="{{$timezone}}" @if($selectedTimeZone===$timezone) selected="selected" @endif>{{$timezone}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary mb-3 mt-2">Filter</button>
                        </form>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header">
                       Tasks List
                    </div>
                    <div class="card-body" style="background:gainsboro">
                       
                       <ul class="list-group list-group-flush">
                           @if(!empty($tasks))
                            @foreach($tasks as $task)
                                <li class="list-group-item mt-2">
                                    <span class="text-left">{{$task['title']}}</span>
                                    <span style="position:absolute;right:20px"><b style="font-size:12px">DeadLine:</b> {{date('h:i A, d F',strtotime($task['deadline']))}}</span>
                                </li>
                            @endforeach
                           @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>