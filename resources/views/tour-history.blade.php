<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Janela Daculong">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your History</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media-queries.css') }}">
    <script src="https://kit.fontawesome.com/5f8be564ce.js" crossorigin="anonymous"></script>
</head>
<body id="history">
    <header id="other-page-header">
        <nav>
            <ul>
                <input type="checkbox" id="menu-toggler" />
                <label id="toggler-label" for="menu-toggler"><i class="fa-solid fa-bars"></i></label>
              <div class="div-logo">
                <a href="{{ route('home') }}">
                  <img src="images/logo1.png" id="logo" width="200px">
                </a>
              </div>
              <li id="user-li">
                <label class="stored-user" name="name">{{ session('name') }}</label>
              </li>
              <div id="li-div">
                  <li>
                    <a href="{{ route('tour_places') }}" data-target="destinations">Destinations</a>
                  </li>
                  <li>
                    <a href="#" data-target="history" class="active">Tour History</a>
                  </li>
                  <li>
                    <a href="{{ route('') }}">Log out</a>
                </li>
              </div>
            </ul>
        </nav>
    </header>
    <main>
        <div class="tour-history-container">
            <div class="history-title">
                <h3>Your Tour History</h3>
            </div>
            @foreach ($booked_tours as $booked_tour)
            <div class="div-tour-details">
                <img src="images/destination-placeholder.png" class="tour-placeholder" width="200px" height="180px">
                <div class="tour-details">
                    <div class="form-group">
                        <label class="booked-label">Booked By: </label>
                        <label class="booked-output">{{ $booked_tour->BookedBy }}</label>
                    </div>
                    <div class="form-group">
                        <label class="booked-label">Destination: </label>
                        <label class="booked-output destination-output">{{ $booked_tour->Destination }}</label>
                    </div>
                    <div class="form-group">
                        <label class="booked-label">Tour Date: </label>
                        <label class="booked-output">{{ $booked_tour->FromDate }} - {{ $booked_tour->ToDate }}</label>
                    </div>
                    <div class="form-group">
                        <label class="booked-label">Pick-Up Location: </label>
                        <label class="booked-output">{{ $booked_tour->PickupPoint }}</label>
                    </div>
                    <div class="form-group">
                        <label class="booked-label">Pick-Up Time: </label>
                        <label class="booked-output">{{ $booked_tour->PickupTime }}</label>
                    </div>
                    <div class="form-group">
                        <label class="booked-label">Booking Date: </label>
                        <label class="booked-output">{{ $booked_tour->created_at }}</label>
                    </div>
                    <div class="form-group">
                        <label class="booked-label">Reference No: </label>
                        <label class="booked-output">{{ $booked_tour->ReferenceNo }}</label>
                    </div>
                </div>
                <div class="button-group">
                    <form action="{{ route('view_tour', $booked_tour->id) }}" method="GET">
                        <button type="submit" id="view-details">View Full Details</button>
                    </form>
                    <form action="{{ route('edit_tour', $booked_tour->id) }}" method="GET">
                        <button type="submit" id="edit-tour">Edit This Tour</button>
                    </form>                
                    <form action="{{ route('delete_tour', $booked_tour) }}" method="POST" id="delete-tour">
                        @method('DELETE')
                        @csrf
                        <button type="submit" id="edit-tour">Delete This Tour</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </main>
    <script src="{{ asset('js/flexible.js') }}"></script>
    <script src="{{ asset('js/tour-history.js') }}"></script>
</body>
</html>