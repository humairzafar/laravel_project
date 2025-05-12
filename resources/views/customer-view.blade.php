<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
      <div class="container">
        <div
            class="table-responsive"
        >
            <table
                class="table table-striped table-dark"
            >
                <thead>
                    
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">Country</th>
                        <th scope="col">Actions</th>
                    </tr>
                   
                </thead>
                <tbody>
                @foreach($customers as $value)
                    <tr class="">
                    <td scope="col">{{$value->customer_id}}</td>
                        <td scope="col">{{$value->name}}</td>
                        <td scope="col">{{$value->email}}</td>
                        <td scope="col">
                            @if($value->gender=="M")
                            Male
                            @elseif($value->gender=="F")
                            Female
                            @else
                            Other
                            @endif
                        </td>
                        <td scope="col">{{$value->address}}</td>
                        <td scope="col">{{$value->country}}</td>
                        <td>
                            <a name="" id=""class="btn btn-danger"
                                href="{{url('/humair/delete/')}}/{{$value->customer_id}}"
                                role="button"
                                >Trash</a
                            >
                            <a name="" id=""class="btn btn-success"
                                href="{{route('humair.edit',['id' => $value->customer_id])}}"
                                role="button"
                                >Edit</a
                            >
                            
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
      </div>
       
       
        
    </body>
</html>
