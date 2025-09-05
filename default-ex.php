<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Catalog</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f0f0;
    }

    .container {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .project {
      margin-bottom: 40px;
    }

    .project img {
      max-width: 100%;
      height: 50vh;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .project p {
      margin-top: 10px;
      font-size: 16px;
      color: #555;
    }

    @media (min-width: 768px) {
      .container {
        padding: 40px;
      }

      .project {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
      }

      .project img {
        max-height: 35vh;
        object-fit: cover;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Project Catalog</h1>

    

    <div class="project">
      <a href="/matrimony">
        <img src="/matrimony.png" alt="Matrimony">
      </a>
      <p>Description of Matrimony</p>
    </div>
    
    <div class="project">
      <a href="/payroll">
        <img src="/payroll.png" alt="payroll">
      </a>
      <p>Description of payroll</p>
    </div>

    <div class="project">
      <a href="/space-vaarta">
        <img src="/space-vaarta.png" alt="space-vaarta">
      </a>
      <p>Description of space-vaarta</p>
    </div>

    <div class="project">
      <a href="/MutualFundVsInsurance">
        <img src="/MutualFundVsInsurance.png" alt="MutualFundVsInsurance">
      </a>
      <p>Description of Mutual Fund Vs Insurance</p>
    </div>
    
    <div class="project">
      <a href="/event-management">
        <img src="/event-management.PNG" alt="Event Management">
      </a>
      <p>Event Management</p>
    </div>

    <div class="project">
      <a href="/risk_management/creative.html">
        <img src="/risk_management.png" alt="risk_management">
      </a>
      <p>Description of risk_management</p>
    </div>


    <!-- Add more projects as needed -->

  </div>
</body>
</html>
