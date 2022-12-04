<div class="form">
<form action="create-req.php" method="POST">

    <label for="subcategory">Sub Category</label>
    <select name="subcategory" id="subcategory" required>
        <option value="">Select a subcategory</option>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <option value="<?php echo $row['subcategory'] ?>"> <?php echo $row['subcategory'] ?> </option>
            <?php
        }
        ?>
    </select>

    <label for="amount">Amount</label>
    <input type="text" name="amount" id="amount" placeholder="Amount" required>

    <select name="unit" id="unit" required>
        <option value="">Select Unit</option>
        <option value="kg">Kilograms</option>
        <option value="packet">Packets</option>
        <option value="pair">Pairs</option>
    </select>

    <label for="urgency"> Urgency </label>
    <select name="urgency" id="urgency" required>
        <option value="">Select Urgency</option>
        <option value="urgent">Urgent</option>
        <option value="immediate">Immediate</option>
        <option value="free">Free</option>
    </select>
    <label for="notes"> Notes </label>
    <textarea name="notes" id="notes" cols="30" rows="10" placeholder="Notes"></textarea>
    <input type="submit" name="submit" id="submit" value="Submit">
</form>
</div>