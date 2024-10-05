<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Leader Board</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('leaderboard.js') }}" type="text/javascript"></script>
    </head>

    <body>
        <div class="page-wrapper">
            <div class="layout-container-area mt-70">
                <div class="layout-container sidemenu-container mt-100">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox bg-boxshadow">
                                <div class="button-container">
                                    <a class="btn btn-primary" href="{{ route('re.calculate') }}">Recalculate</a>
                                </div>

                                <!-- Filter Container -->
                                <form action="{{ route('home') }}" method="GET" class="filter-container">
                                    <div>
                                        <label for="search">User ID:</label>
                                        <input type="text" name="user_id" id="search" placeholder="Search..." aria-label="Search User ID" value="{{ request()->get('user_id') }}">
                                        <button class="btn btn-primary" type="submit">Filter</button>
                                    </div>
                                    <div>
                                        <label for="filter">Sort by:</label>
                                        <select id="filter" name="sort_by" aria-label="Sort by options">
                                            <option value="">All</option>
                                            <option value="Day" {{ request()->get('sort_by') === 'Day' ? 'selected' : '' }}>Day</option>
                                            <option value="Month" {{ request()->get('sort_by') === 'Month' ? 'selected' : '' }}>Month</option>
                                            <option value="Year" {{ request()->get('sort_by') === 'Year' ? 'selected' : '' }}>Year</option>
                                        </select>
                                    </div>
                                </form>

                                <!-- Ibox Content -->
                                <div class="ibox-content">
                                    <!-- Table Responsive -->
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" id="leaderboard">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Points</th>
                                                    <th>Rank</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($getUserData->count() > 0)
                                                    @foreach($getUserData as $row)
                                                        <tr>
                                                            <td>{{ $row->id }}</td>
                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ (count($row->activities) * 20) }}</td>
                                                            <td>{{ $row->rank }}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td class="text-center" colspan="4">No records Found</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
</html>
