@extends('layouts.email')

@section('subject', $subject)

@section('content')

                            <!-- MODULE ROW // -->
                            <!--
                                To move or duplicate any of the design patterns
                                in this email, simply move or copy the entire
                                MODULE ROW section for each content block.
                            -->
                            <tr>
                                <td align="center" valign="top">
                                    <!-- CENTERING TABLE // -->
                                    <!--
                                        The centering table keeps the content
                                        tables centered in the emailBody table,
                                        in case its width is set to 100%.
                                    -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="#333">
                                        <tr>
                                            <td align="center" valign="top">
                                                <!-- FLEXIBLE CONTAINER // -->
                                                <!--
                                                    The flexible container has a set width
                                                    that gets overridden by the media query.
                                                    Most content tables within can then be
                                                    given 100% widths.
                                                -->
                                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                                    <tr>
                                                        <td align="center" valign="top" width="500" class="flexibleContainerCell">

                                                            <!-- CONTENT TABLE // -->
                                                            <!--
                                                            The content table is the first element
                                                                that's entirely separate from the structural
                                                                framework of the email.
                                                            -->
                                                            <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td align="center" valign="top" class="textContent">
                                                                        <h1 style="color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;">Your M.O.T. expires soon</h1>
                                                                        <h2 style="text-align:center;font-weight:normal;font-family:Helvetica,Arial,sans-serif;font-size:20px;margin-bottom:0;color:#ccc;line-height:135%;">Want to book your vehicle in with MPK Autos?</h2>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- // CONTENT TABLE -->

                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->

                            <!-- MODULE ROW // -->
                            <tr>
                                <td align="center" valign="top">
                                    <!-- CENTERING TABLE // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center" valign="top">
                                                <!-- FLEXIBLE CONTAINER // -->
                                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                                    <tr>
                                                        <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                                            <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td align="center" valign="top">

                                                                        <!-- CONTENT TABLE // -->
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tr>
                                                                                <td valign="top" class="textContent">
                                                                                    {!! $messageBody !!}
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <!-- // CONTENT TABLE -->

                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->

                            <!-- MODULE ROW // -->
                            <tr>
                                <td align="center" valign="top">
                                    <!-- CENTERING TABLE // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center" valign="top">
                                                <!-- FLEXIBLE CONTAINER // -->
                                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                                    <tr>
                                                        <td valign="top" width="500" class="flexibleContainerCell">

                                                            <!-- CONTENT TABLE // -->
                                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td align="left" valign="top" class="flexibleContainerBox" style="background-color:#5F5F5F;">
                                                                        <table border="0" cellpadding="30" cellspacing="0" width="100%" style="max-width:100%;">
                                                                            <tr>
                                                                                <td align="left" class="textContent">
                                                                                    <h3 style="color:#FFFFFF;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">Servicing</h3>
                                                                                    <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;">Want to get your vehicle serviced at the same time as your M.O.T.? Our prices start at &pound;50.</div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <td align="right" valign="top" class="flexibleContainerBox" style="background-color:#ae4444;">
                                                                        <table class="flexibleContainerBoxNext" border="0" cellpadding="30" cellspacing="0" width="100%" style="max-width:100%;">
                                                                            <tr>
                                                                                <td align="left" class="textContent">
                                                                                    <h3 style="color:#FFFFFF;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">Quite busy?</h3>
                                                                                    <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;">We can collect and return your vehicle to you, call us to arrange.</div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- // CONTENT TABLE -->

                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->

@endsection