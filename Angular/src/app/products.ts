export interface Product{
    id: number,
    name: string,
    price: number,
    description: string,
    quantity:number,
    totalprice: number
}
export interface CartItem{
    id:number;
    name: string;
    price:number;
}

export const products = [
    {
        id:1,
        name: "Iphone13 mini",
        price: 25000,
        description: "",
        quantity:1,
        totalprice: 0
    },
    {
        id:2,
        name: "Iphone13 ",
        price: 35000,
        description: ""
        ,quantity:1,
        totalprice: 0


    },
    {
        id:3,
        name: "Iphone13 pro",
        price: 45000,
        description: ""
        ,quantity:1,
        totalprice: 0


    },
    {
        id:4,
        name: "Iphone13 pro-max",
        price: 55000,
        description: ""
        ,quantity:1,
        totalprice: 0

 
    },
]