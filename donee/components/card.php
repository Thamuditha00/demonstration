<div class="content-card">

        <span class="rq-subcategory">
          <?php echo $row['item']; ?>
        </span><br/>

    <span class="rq-status">Approval:
          <?php echo $row['approval']; ?>
        </span>

    <span class="rq-date">
          <?php echo $row['postedDate']; ?>
        </span>


    <span class="rq-urgency">
          <?php echo $row['urgency']; ?>
        </span>

    <div class="rq-button">
        <button id="view">View</button>
        <button id="delete">Delete</button>
    </div>
</div>