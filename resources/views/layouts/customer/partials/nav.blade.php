<table style="width:100%">
    <tr>
        <td colspan='3'>
            <p>
                <img src="{{ asset('images/dragon-small.png') }}" style="float:left;height:200px" alt="Golden Dragon">
                <img src="{{ asset('images/dragon-small-flipped.png') }}" style="float:right;height:200px" alt="Golden Dragon">
                <span style="font-size:40px;font-weight:bold;color:yellow">Chinees Indische Specialiteiten</span><br>
                <span style="font-size:50px;font-weight:bold;color:yellow">De Gouden Draak</span><br>
            </p>
            <table style="margin:auto;font-size:20px;color:white;">
                <tr>
                    <td style="vertical-align: middle;background-image: linear-gradient(#00F3FF, #165FE9);">
                        <a href="{{ route('customer.menu') }}" style="color:white;text-decoration:none">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menukaart&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                    </td>
                    <td style="vertical-align: middle;background-image: linear-gradient(#00F3FF, #165FE9);">
                        <a href="{{ route('customer.news') }}" style="color:white;text-decoration:none">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nieuws&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                    </td>
                    <td style="vertical-align: middle;background-image: linear-gradient(#00F3FF, #165FE9);">
                        <a href="{{ route('customer.contact') }}" style="color:white;text-decoration:none">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr style="padding-top:50px">
        <td colspan="3" height="50px">
        </td>
    </tr>
    <tr style="padding-top:50px">
        <td style="width:50px">
        </td>
        <td style="text-align:center; border:1px solid black; background:floralwhite;"><br>
            @yield('content')
        </td>
        <td style="width:50px">
        </td>
    </tr>
</table>
