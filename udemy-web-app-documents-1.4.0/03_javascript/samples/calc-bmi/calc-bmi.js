const bmi = calculateBmi(1.65, 58);
let message = 'わかりません';
if (bmi < 18.5) {
    // 痩せているとき
    message = '低体重です';
} else if (bmi >= 25.0) {
    // 太っているとき
    message = '太っています';
} else {
    // 普通のとき
    message = 'ふつうです';
}
console.log(message);

function calculateBmi(height, weight) {
    // BMI = 体重[kg] / (身長[m] * 身長[m])
    return weight / (height ** 2);
}
