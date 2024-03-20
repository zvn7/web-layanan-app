/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

// datatable
$(document).ready( function () {
    $('#myTable').DataTable();
} );

// modal confirmation
function submitDel(id)
{
    $('#del-'+id).submit()
}

// logout
function returnLogout()
{
    var link = $('#logout').attr('href')
    $(location).attr('href', link)
}