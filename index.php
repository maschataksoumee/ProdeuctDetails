<?php 
    include("include/header.php"); 
    include("db_connect.php"); 
?>
<script>
    $(document).ready(function(e){
        $("#loading-bar-spinner").hide();
        // for fetching product type  dropdown id #product_type
        $.ajax({
			type: "GET",
			url: "api/fetch_product_type.php",
			dataType : "JSON",
			data: null,
			success:function(data)
			{
				var select = "";
				var j = 0;
				if(data.length > 0)
				{
					select += "<option value=''>~ Select Product Type ~</option>";
					for(var j=0;j<data.length;j++)
					{
						select += "<option value='"+data[j]['product_type']+"'>"+data[j]['product_type']+"</option>";
					}
				}
				$("#product_type").html(select);
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError);
			}
		});
        // for fetching product type  dropdown id #product_type
    });
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-6 offset-md-4">
            <select class="form-control form-control-lg" id="product_type">
                <option value="">~ Select Product Type ~</option>
            </select>
        </div>
        <!-- <div class="col-md-2 col-sm-6">
            <button type="button" class="btn btn-dark" id="btn_fetch_product_details">
                <i class="fa fa-check-square-o" aria-hidden="true"></i> VIEW
            </button>
        </div> -->
    </div>
</div>
<div id="loading-bar-spinner" class="spinner">
	<div class="spinner-icon"></div>
</div>
<div id="divResponse" style="height:550px;overflow:auto;">
</div>
<script>
    $(document).ready(function(e){
        const limit = 20;
        const offset = 20;
        var offset_count = 0;
        var serial_no = 1; 
        $("#product_type").change(function(e){
            serial_no = 1;
            offset_count = 0;
            var product_type = $("#product_type").val();
            if($("#product_type").val())
            {
                $("#loading-bar-spinner").show();
                $.ajax({
                    type: "GET",
                    url: "api/fetch_product_details.php",
                    dataType : "JSON",
                    data: "product_type="+product_type+"&limit="+limit+"&offset_count="+offset_count,
                    success:function(response)
                    {
                        $("#divResponse").html("");
                        if(response.length>0)
                        {
                            var details = "";
                            details += "<table class='table table-sm table-striped table-bordered table-hover text-center' id='table_product_details'>"+
                                            "<thead class='bg-dark text-white'>"+
                                                "<tr>"+
                                                    "<th>#</th>"+
                                                    "<th>Product Name</th>"+
                                                    "<th>Product Code</th>"+
                                                    "<th>Price</th>"+
                                                    "<th>Purchase Date</th>"+
                                                    "<th>Product Type</th>"+
                                                "</tr>"+
                                            "</thead>"+
                                            "<tbody>";
                            var i = 0;
                            for(var i=0;i<response.length;i++)
                            {
                                details += "<tr>"+
                                                "<td>"+serial_no+"</td>"+
                                                "<td>"+response[i]['product_name']+"</td>"+
                                                "<td>"+response[i]['product_code']+"</td>"+
                                                "<td>"+response[i]['price']+"</td>"+
                                                "<td>"+response[i]['purchase_date']+"</td>"+
                                                "<td>"+response[i]['product_type']+"</td>"+
                                            "<tr>";
                                serial_no = serial_no + 1;
                            }
                            details += "</tbody>"+
                                        "</table>";
                            $("#divResponse").show().html(details);
                            $("#loading-bar-spinner").hide();
                        } 
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError);
                        $("#loading-bar-spinner").hide();
                    }
                });
            }
            else
            {
                serial_no = 1;
                offset_count = 0;
                $("#divResponse").html("");
            }
        });
        var appnd = "";
        $('#divResponse').bind('scroll', function(){
            var product_type = $("#product_type").val();
            if($(this).scrollTop() + $(this).innerHeight()>=$(this)[0].scrollHeight)
            {
                offset_count = offset_count + offset;
                $.getJSON("api/fetch_product_details.php?product_type="+product_type+"&limit="+limit+"&offset_count="+offset_count, function(response){
                    if(response.length>0)
                    {
                        var k = 0;
                        for(var k=0;k<response.length;k++)
                        {
                            $("#loading-bar-spinner").show();
                            appnd += "<tr>"+
                                            "<td>"+serial_no+"</td>"+
                                            "<td>"+response[k]['product_name']+"</td>"+
                                            "<td>"+response[k]['product_code']+"</td>"+
                                            "<td>"+response[k]['price']+"</td>"+
                                            "<td>"+response[k]['purchase_date']+"</td>"+
                                            "<td>"+response[k]['product_type']+"</td>"+
                                        "<tr>";
                            serial_no = serial_no + 1;
                        }
                            $("#table_product_details").append(appnd);  
                        appnd = "";
                        $("#loading-bar-spinner").hide();  
                    }
                });
                
            }
        });  
    });
</script>
<?php include("include/footer.php"); ?>