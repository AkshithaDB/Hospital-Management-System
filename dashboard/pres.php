<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Personal Information
    $name = $_POST["pname"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    
    // Card Details
    $healthCareCardNo = $_POST["h_no"];
    $healthCareCardExpiry = $_POST["h_expiry"];
    $pensionCardNo = $_POST["p_no"];
    $pensionCardExpiry = $_POST["p_expiry"];
    $healthInsuranceName = $_POST["hi_name"];
    $healthInsuranceNo = $_POST["hi_no"];
    
    // Next of Kin/Emergency Contact
    $kinName = $_POST["kin_name"];
    $kinPhone = $_POST["kin_phone"];
    $relationship = $_POST["relationship"];
    
    // You can process the collected data here, for example, save it to a database or perform any other desired actions.
    
    // For this example, we'll simply display the collected data.
    echo "<h1>Personal Information</h1>";
    echo "Name: $name<br>";
    echo "Phone: $phone<br>";
    echo "Date of Birth: $dob<br><br>";
    
    echo "<h2>Card Details</h2>";
    echo "Health Care Card No/Name: $healthCareCardNo<br>";
    echo "Health Care Card Expiry: $healthCareCardExpiry<br>";
    echo "Pension Card No: $pensionCardNo<br>";
    echo "Pension Card Expiry: $pensionCardExpiry<br>";
    echo "Private Health Insurance Name: $healthInsuranceName<br>";
    echo "Private Health Insurance No: $healthInsuranceNo<br><br>";
    
    echo "<h2>Next of Kin/Emergency Contact</h2>";
    echo "Name: $kinName<br>";
    echo "Phone Number: $kinPhone<br>";
    echo "Relationship: $relationship";
} else {
    // If the form is not submitted, you can redirect or display an error message here.
    echo "Form submission error.";
}
?>
