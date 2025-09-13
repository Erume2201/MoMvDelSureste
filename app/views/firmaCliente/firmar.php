<!-- Se incluyen archivos php -->
<?php 
require_once __DIR__ . '/../config/config.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firmar Documento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
            background-color: #f4f4f9;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        #main-container {
            display: flex;
            gap: 20px;
            width: 90%;
            justify-content: center;
        }

        #pdf-container {
            width: 70%;
            height: 600px;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        #pdf-display {
            width: 100%;
            height: 100%;
        }

        #controls-container {
            width: 25%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }
        
        #signature-section {
            display: none;
            text-align: center;
        }

        #signature-pad-container {
            border: 1px solid #000;
            width: 100%;
            height: 150px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        #signature-pad {
            width: 100%;
            height: 100%;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            color: white;
            transition: background-color 0.3s;
        }

        #start-sign-btn {
            background-color: #4CAF50;
        }
        
        #start-sign-btn:hover {
            background-color: #45a049;
        }
        
        #clear-btn {
            background-color: #f44336;
        }
        
        #clear-btn:hover {
            background-color: #e53935;
        }

        #save-btn {
            background-color: #2196F3;
        }

        #save-btn:hover {
            background-color: #1e88e5;
        }

        #loader {
            display: none;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>

    <h2>Firmar y Guardar Documento</h2>

    <div id="main-container">
        <div id="pdf-container">
            <iframe id="pdf-display" src="<?php echo BASE_URL; ?>app/pdf/cotizacion-002.pdf" frameborder="0"></iframe>
        </div>

        <div id="controls-container">
            <button id="start-sign-btn">Firmar Documento</button>

            <div id="signature-section">
                <h3>Firme aquí:</h3>
                <div id="signature-pad-container">
                    <canvas id="signature-pad"></canvas>
                </div>
                <div class="button-container">
                    <button id="clear-btn">Limpiar Firma</button>
                    <button id="save-btn">Guardar PDF Firmado</button>
                </div>
                <div id="loader"></div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?php echo BASE_URL; ?>app/controllers/js/firmaPdf.js"></script>

</body>
</html>


