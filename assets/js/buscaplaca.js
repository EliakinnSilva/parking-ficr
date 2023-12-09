function procurarCarro() {
    var placa = document.getElementById("placaInput").value; // get car's license plate

    // simulate car search logic (replace with actual logic)
    var carrosEstacionados = [
        { placa: "123ABC", localizacao: "Rua A, Vaga 1" },
        { placa: "456DEF", localizacao: "Rua B, Vaga 3" },
        { placa: "789GHI", localizacao: "Estacionamento C, Vaga 5" }
        // add more cars as needed
    ];

    var carroEncontrado = carrosEstacionados.find(function (carro) {
        return carro.placa === placa; // search for car by license plate
    });

    if (carroEncontrado) {
        // redirect to results page
        window.location.href = "resultados.html";
    } else {
        alert("Veículo não encontrado. Tente novamente."); // notify user if car is not found
    }
}