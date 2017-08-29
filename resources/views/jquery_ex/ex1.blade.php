<h5>Ex.1 : Manipulation with js</h5>

<div class="row ex1_show-grid">
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
    <div class="col-md-1">.col-md-1</div>
</div>

<script>
    if(!jQuery) {
        alert('jquery is not there');
    } else {
        console.log('jQuery is there');
    }

    $(document).ready(function() {
        var $row = $('.row');
        $($row.children('div').get(3)).text('changed by jquery');
    });
</script>