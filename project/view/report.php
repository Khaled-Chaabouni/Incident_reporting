
<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script>
            document.getElementById("reportform").addEventListener("submit", function(event) {
                // Prevent the default form submission behavior
                event.preventDefault();
                alert("fuck");
                // Handle the form submission here (optional)

                // Redirect to the specified location
                window.location.href = "../view/index.php";
            });


        
        </script>
    </head>
    <body class="Landing">
        <?php
            require_once '../model/dbcon.php';
        ?>
        
        
        <main class="container mt-5">
            <form action="../controller/submit_report.php" method="POST" id="reportform" class="col-md-4 mx-auto border rounded shadow p-4">
                <h1 class="mb-4">Report Card</h1>

                <div class="mb-3">
                    <label for="type" class="form-label">Type of threat :</label>
                    <input type="text" id="type" name="type" class="form-control" autocomplete="off" oninput="showSuggestions()" required list="threats">
                    <datalist id="threats"></datalist>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Provide details :</label>
                    <textarea id="content" name="content" rows="4" class="form-control" style="resize: none;" required></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="impact" class="form-label">Rate the incident :</label>
                    <input list="impacts" name="impact" id="impact" class="form-control" required>
                    <datalist id="impacts">
                        <option value="light">
                        <option value="moderate">
                        <option value="severe">
                    </datalist>
                </div>
                
                <div class="mb-3">
                    <label for="measures" class="form-label">Measures to be taken :</label>
                    <input type="text" id="measures" name="measures" class="form-control" required>
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Generate Report</button>
            </form>
        </main>
            <script>
                const threats = [
            "Malware Infections", "Data Breaches", "Phishing and Social Engineering", "Denial of Service (DoS) and Distributed Denial of Service (DDoS) Attacks",
            "Insider Threats", "Physical Security Incidents", "Brute Force Attacks", "Man-in-the-Middle (MitM) Attacks", "SQL Injection and Code Injection",
            "Cross-Site Scripting (XSS)", "Zero-Day Exploits", "IoT (Internet of Things) Vulnerabilities", "Pharming Attacks", "Password Attacks",
            "Eavesdropping and Wiretapping", "Unauthorized Access", "Supply Chain Attacks", "Malvertising", "Data Leakage", "Cryptojacking",
            "Cyber Espionage", "Insufficient Patch Management", "Cookies Injections", "Session Hijacking or Fixation", "Cross-Site Scripting (XSS) via Cookies",
            "Cookie Theft", "Cookie Injection", "Cookie Manipulation for Account Takeover", "Insufficiently Secure Cookies", "Persistent Cookies Abuse",
            "Cookie Flooding", "Cookie Disclosure in URLs"
        ];

        // Function to update input field with auto-completion suggestions
        function showSuggestions() {
            const input = document.getElementById('type');
            const userInput = input.value.toLowerCase();

            const filteredThreats = threats.filter(threat =>
                threat.toLowerCase().includes(userInput)
            );

            input.setAttribute('list', 'threats');
            const dataList = document.getElementById('threats');
            dataList.innerHTML = '';

            filteredThreats.forEach(threat => {
                const option = document.createElement('option');
                option.value = threat;
                dataList.appendChild(option);
            });
        }
            </script>
        
    </body>
</html>