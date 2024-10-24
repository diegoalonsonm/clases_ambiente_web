const calcularIMC = () => {
    let peso = document.getElementById('peso').value
    let altura = document.getElementById('altura').value / 100

    let imc = peso / (altura * altura)
    alert(`Tu IMC es: ${imc.toFixed(2)}`)
}

const calcularPropina = () => {
    let mesero = document.getElementById('mesero').value
    let monto = document.getElementById('monto').value
    let propina = document.getElementById('propina').value / 100

    let montoPagar = monto * (1 + propina)
    alert(`El monto a pagar es: ${montoPagar.toFixed(2)}. Servicio dado por ${mesero}`)
}