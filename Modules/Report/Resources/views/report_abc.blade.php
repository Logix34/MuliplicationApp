@extends('user::layouts.master')

@section('content')
    <h1>ABC CHURCH PLANTING REPORT</h1>
    <p>Monthly Report</p>
    <form method="post" action="{{ route('report.abc.store') }}" enctype="multipart/form-data" >
            @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <h3>General Info</h3>
        <table class="table table-bordered">
            <tr>
                <td>Month of Report</td>
                <td><input type="month" name="month" class="form-control" required></td>
                <td>Mentoring Meeting Attended</td>
                <td>
                    <label for="meeting_yes">Yes</label>
                    <input type="radio" id="meeting_yes" name="meeting_attended" value="1" class="form-check" required>
                </td>
                <td>
                    <label for="meeting_no">No</label>
                    <input type="radio" id="meeting_no" name="meeting_attended" value="0" class="form-check" required>
                </td>
            </tr>
            <tr>
                <td>CHURCH PLANTER’S NAME</td>
                <td colspan="4"><input type="text" name="cp_name" class="form-control" value="{{$user->name}}" readonly required></td>
            </tr>
            <tr>
                <td>CHURCH PLANTER’S ZONE</td>
                <td colspan="4"><input type="text" name="cp_zone" class="form-control" required></td>
            </tr>
            <tr>
                <td>ZONE COORDINATOR</td>
                <td colspan="4"><input type="text" name="zone_coordinator" class="form-control" required></td>
            </tr>
        </table>

        <hr>
        <h3>INDIVIDUALS</h3>
        <table class="table table-bordered">
            <tr>
                <td></td>
                <td>Monthly Goal</td>
                <td>Monthly Result</td>
            </tr>
            <tr>
                <td>
                    NEW CONTACTS <br>
                    <small>people contacted in the church planting context to present the gospel</small>
                </td>
                <td>
                    <input type="number" name="contacts_goal" class="form-control" required>
                </td>
                <td>
                    <input type="number" name="contacts_result" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    NEW CONVERSIONS<br>
                    <small>followers of jesus</small>
                </td>
                <td>
                    <input type="number" name="conversions_goal" class="form-control" required>
                </td>
                <td>
                    <input type="number" name="conversions_result" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    NEW PERSONS BAPTIZED<br>
                    <small>people participating in the sacrament of baptism</small>
                </td>
                <td>
                    <input type="number" name="baptized_goal" class="form-control" required>
                </td>
                <td>
                    <input type="number" name="baptized_result" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    NEW LEADERS IN TRAINING<br>
                    <small>people that the planter is training for leadership</small>
                </td>
                <td>
                    <input type="number" name="leaders_goal" class="form-control" required>
                </td>
                <td>
                    <input type="number" name="leaders_result" class="form-control" required>
                </td>
            </tr>
        </table>

        <hr>
        <h3>SMALL GROUPS | Minimum 2 new disciples and one leader</h3>
        <table class="table table-bordered">
            <tr>
                <td></td>
                <td>Monthly Goal</td>
                <td>Monthly Result</td>
            </tr>
            <tr>
                <td>
                    NEW SMALL GROUPS<br>
                    <small>groups initiated this month</small>
                </td>
                <td>
                    <input type="number" name="groups_goal" class="form-control" required>
                </td>
                <td>
                    <input type="number" name="groups_result" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    NEW PARTICIPANTS IN SMALL GROUPS<br>
                    <small>new people participating in small groups this month</small>
                </td>
                <td>
                    <input type="number" name="participants_goal" class="form-control" required>
                </td>
                <td>
                    <input type="number" name="participants_result" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    NEW LEADERS WITH A GROUP<br>
                    <small>new leaders with a group under the supervision of the planter</small>
                </td>
                <td>
                    <input type="number" name="group_leaders_goal" class="form-control" required>
                </td>
                <td>
                    <input type="number" name="group_leaders_result" class="form-control" required>
                </td>
            </tr>
        </table>
        <hr>
        <div class="row">
            <div class="col-12">
                <h5>Prayer Requests</h5>
                <div class="form-group col-12">
                    <span class="data-label">Request 1</span>
                    <input name="prayer_1" class="form-control">
                </div><!-- data-item -->
                <div class="form-group col-12">
                    <span class="data-label">Request 2</span>
                    <input name="prayer_2" class="form-control">
                </div><!-- data-item -->
                <div class="form-group col-12">
                    <span class="data-label">Request 3</span>
                    <input name="prayer_3" class="form-control">
                </div><!-- data-item -->
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h5>Testimony</h5>
                <div class="form-group col-12">
                    <textarea name="testimony" id="" cols="30" rows="10" style="width: 100%; padding: 15px"></textarea>
                </div><!-- data-item -->
            </div>
        </div>


        <button type="submit" class="btn btn-lg btn-primary my-3 right-pull">Save </button>
        </form>

@endsection
@section('script')

@endsection