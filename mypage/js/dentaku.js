// 現在の合計値
myTotal = 0;

// 現在入力している値
myInput = "";

// 合計と入力値の演算子
myCalc = "+";

// １回前に入力したもの 0:数字 1:演算子
myFlg = 1;

/**
 * 現在の値を押したボタンの入力値に書き換える
 * 
 * @param myData 押したボタンの数値
 */
function myValue(myData)
{
    myFlg = 0;
    myInput += myData; 
    document.myForm.myLine.value = myInput; 
}	

/**
 * フラグが立っていれば計算する
 * 
 * @param myData 押したボタンの数値
 */
function myCalculate(myData)
{
    // 演算ボタンを押した
    // １回前に入力したものは数値か？
    if (myFlg == 0) {
        myFlg = 1;
        
        // 一連の計算式を作る
        myWork = myTotal + myCalc + myInput;

        // 計算式を計算させる
        myTotal = eval(myWork);

        // 現在入力している値をクリア
        myInput = "";

        // 合計を表示
        document.myForm.myLine.value = myTotal;
    }

    // 演算ボタンは[＝]か？
    if (myData == "=") {

        // 合計をクリア
        myTotal = 0;

        // 演算子を[+]とする
        myCalc = "+";
    
    // 演算ボタンは[＝]以外である
    } else {

        // 演算子を退避させておく
        myCalc = myData;
    }	
}	

/**
 * クリアボタン[C]を押した
 */
function myC()
{	
    // 合計クリア
    myTotal = 0;

    // 演算子クリア
    myInput = "";	
    
    // つまり、0を表示
    // 現在入力している値をクリア
    document.myForm.myLine.value = myTotal;
}