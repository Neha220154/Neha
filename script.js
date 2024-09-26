async function fetchProducts()
 {
    const response = await fetch('/api/products');
    const products = await response.json();
    displayProducts(products);
}

function displayProducts(products) 
{
    const productList = document.getElementById('product-list');
    productList.innerHTML = '';
    
    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.classList.add('product');
        productDiv.innerHTML = `
            <h2>${product.name}</h2>
            <p>Quantity: ${product.quantity}</p>
            <p>Price: $${product.price}</p>
        `;
        productList.appendChild(productDiv);
    });
}
async function fetchProducts() 
{
    const response = await fetch('/api/products');
    const products = await response.json();
    displayProducts(products);
}

function displayProducts(products) 
{
    const productList = document.getElementById('product-list');
    productList.innerHTML = '';
    
    products.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.classList.add('product');
        productDiv.innerHTML = `
            <h2>${product.name}</h2>
            <p>Quantity: ${product.quantity}</p>
            <p>Price: $${product.price}</p>
        `;
        productList.appendChild(productDiv);
    });
}
document.addEventListener('DOMContentLoaded', fetchProducts);
