<select id="mydropdown" onchange="loadData();">
    <option value="a">Some Option</option>
    <option value="b">Another Option</option>
</select>
<div id="displayArea">
</div>


<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">

    function loadData()
    {
        $.ajax(
        {
             url:"load_data.php",
             type:"POST",
             data:{selectedOption:$("#mydropdown").val()}
        })
        .done(function(data)
        {
             var returnData=$.parseJSON(data);
             //do something with the data that was returned
             $.each(returnData, function(k, v)
             {
                  //work with a single item in the array of returned data
                  $("#displayArea").append(v.name);
             });
        })
        .fail(function()
        {
            alert("Something went horribly wrong while trying to get your data! I think the internet is broken");
        });

    }

</script>
