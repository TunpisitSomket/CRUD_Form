<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> CRUD </title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="fa/css/font-awesome.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    </head>

<body>
    <nav class="navbar navbar-light bg-success">
        <span class="navbar-brand mb-0 h1">
            <h3>MOON-MOON</h3>
        </span>
    </nav>

    <input type="hidden" id="hfRowIndex" value="" />
    <table class="table">
        <tr>
            <td>Id</td>
            <td><input type="text" name="Id" id="txtId" value="" /></td>
        </tr>
        <tr>
            <td>ชื่อเมนู</td>
            <td><input type="text" name="Name" id="txtName" value="" /></td>
        </tr>
        <tr>
            <td>ราคา</td>
            <td><input type="text" name="price" id="txtPrice" value="" /></td>
        </tr>
        <select id="optCate" class="form-control">
            <option disabled selected value="typefood"> ประเภทอาหาร </option>
            <option value="single dish"> อาหารจานเดี่ยว </option>
            <option value="dessert"> ของหวาน </option>
            <option value="drink"> เครื่องดื่ม </option>
        </select>
        <tr>
            <td>
                <button type='button' id='btnAdd' class="btn btn-success">Add</button>
                <button type='button' id='btnUpdate' style="display: none;">Update</button>
            </td>
            <td><button type='button' id='btnClear'>Clear</button></td>
        </tr>
    </table>
    <table id="tblCustomers" class="table ">
        <thead class="table-success">
            <tr>
                <th>Id</th>
                <th>ชื่อ</th>
                <th>ราคา</th>
                <th>ประเภท</th>
                <th>Edit</th>
                <th>Delete</th>
                

            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</body>

<script>
    $(function () {
        $('#btnAdd').on('click', function () {
            var name, price, id;
            id = $("#txtId").val();
            name = $("#txtName").val();
            price = $("#txtPrice").val();
            categories = $("#optCate").val();

            var edit = "<a class='edit' href='JavaScript:void(0);' >Edit</a>";
            var del = "<a class='delete' href='JavaScript:void(0);'>Delete</a>";

            if (name == "" || price == "") {
                alert("ID, Name and price fields required!");
            } else {
                var table = "<tr><td>" + id + "</td><td>" + name + "</td><td>" + price + "</td><td>" + categories +"</td><td>" + edit + "</td><td>" + del + "</td></tr>";
                $("#tblCustomers").append(table);
            }
            id = $("#txtId").val("");
            name = $("#txtName").val("");
            price = $("#txtPrice").val("");
            categories = $("#optCate").val("");

            Clear();
        });

        $('#btnUpdate').on('click', function () {
            var name, price, id;
            id = $("#txtId").val();
            name = $("#txtName").val();
            price = $("#txtPrice").val();

            $('#tblCustomers tbody tr').eq($('#hfRowIndex').val()).find('td').eq(1).html(name);
            $('#tblCustomers tbody tr').eq($('#hfRowIndex').val()).find('td').eq(2).html(price)

            $('#btnAdd').show();
            $('#btnUpdate').hide();
            Clear();
        });

        $("#tblCustomers").on("click", ".delete", function (e) {
            if (confirm("Are you sure want to delete this Menu")) {
                $(this).closest('tr').remove();
            } else {
                e.preventDefault();
            }
        });

        $('#btnClear').on('click', function () {
            Clear();
        });

        $("#tblCustomers").on("click", ".edit", function (e) {
            var row = $(this).closest('tr');
            $('#hfRowIndex').val($(row).index());
            var td = $(row).find("td");
            $('#txtId').val($(td).eq(0).html());
            $('#txtName').val($(td).eq(1).html());
            $('#txtPrice').val($(td).eq(2).html());
            $('#btnAdd').hide();
            $('#btnUpdate').show();
        });
    });
    function Clear() {
        $("#txtId").val("");
        $("#txtName").val("");
        $("#txtPrice").val("");
        $("#hfRowIndex").val("");
    }
</script>
</script>

</html>
