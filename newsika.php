<html>
    <head>
        <meta charset="UTF-8">
        <title>login or signup</title>
        <style>
            table,tr,td,th{
                border-collapse: collapse;
                height:30;
            }
            table{
                table-layout: fixed;
                width: 100%;
            }
.txtbox {
    font-size: 14pt;
    height: 35px;
    width : 200px;
    border: 1px solid midnightblue;
  border-radius: 5px;
  padding: 20px 20px;
  margin: 10px;
  
}
.txtbox3{
    font-size: 14pt;
    height: 35px;
    width : 400px;
    border: 1px solid midnightblue;
  border-radius: 5px;
  padding: 20px 20px;
  margin: 10px;
  
}


.pointer{
        height: 40px;
        width: 150pt;
        background-color: green;
        border: 1px solid black;
        border-radius: 5px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        margin-right: 20px;
        margin-top: 20px;
        margin-bottom: 20px;
}
.drop{
    width:70px;
    height: 30px;
    padding-left: 10px;
}
.gender{
        font-size: 20px;
        color: gray;
        padding-left: 10px;
        font-weight: bold;
}            
        </style>
    </head>
    <body>
        <form>
            <table>
                            <tr style="background-color: navy">
                                <td colspan="2" rowspan="3 " style="text-align: center;color:white;font-size: 80px">facebook</td>
                                <td style="text-align: right;color:white;padding-right: 70px">Email or Phoneno</td>
                                <td style="text-align: left;color:white;padding-left: 10px">Password</td>                
                            </tr>
                            <tr style="background-color: navy">
                                <td style="text-align: right;padding-right: 10px">
                                    <input type="text" name="login">
                                </td>
                                <td style="padding-left: 10px">
                                    <input type="password" name="login" >
                                <input type="button" name="login" value="Log In" style="background-color: rgba(90, 145, 218, 0.404);color: white;font-weight:bold;border: 1px solid rgb(108, 108, 185)"></td>                                      
                            </tr>
                            <tr style="background-color: navy">
                                <td>
                                    
                                </td>
                                <td>
                                        <a href="www.amazon.com" style="color: rgb(92, 157, 179) ;padding-left: 10px">forgottten password</a>
                                </td>
                            </tr>
                            <tr style="background-color:#e0f4fc">
                                <td colspan="2" rowspan="11" style="font-size: 20px;font-weight:bold;color:midnightblue;text-align: left;padding-left: 300px;padding-bottom: 250px;padding-right: 200px;">
                                        Facebook helps you connect and share with the people in your life.<br>
                                        <img src="../IMG/OBaVg52wtTZ.png" style="text-align: center">
                                    </td>
                                        <td colspan="2" style="font-size: 50px;font-family: Arial;font-weight: 600">
                                                Create an account                                       
                                        </td>                             
                            </tr>
                            <tr style="background-color:#e0f4fc">
                                <td colspan="2" style="font-size: 20px;font-family: Arial;font-weight: bold;background-color:#e0f4fc">
                                        It's free and always will be.
                                </td>
                            </tr>
                            <tr style="background-color: #e0f4fc; ">
                                <td colspan="2" ><input class="txtbox" type="text" name="login" placeholder="First Name" style="padding-right: 10px" >
                                    <input  class="txtbox" type="text" name="login" placeholder="Sur Name" id="txtbox"></td>
                                
                            </tr>
                            <tr style="background-color:#e0f4fc">
                                    <td colspan="2" ><input class="txtbox3"type="text" name="login" placeholder="Mobile number or email address" id="txtbox"></td>
                                </tr>
                                <tr style="background-color:#e0f4fc">
                                    <td colspan="2"><input class="txtbox3" type="text" name="login" placeholder="New Password" id="txtbox"></td>
                                </tr>
                                <tr style="background-color:#e0f4fc">
                                    <td colspan="2" style="font-weight: bold;font-size:15pt;color: gray;padding-left: 10px" >Birthday<br>
                                        <select class="drop">
                                                <option value="Day" >Day</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23" selected>23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31" >31</option>
                                              </select>
                                              <select class="drop">
                                                    <option value="Month">Month</option>
                                                    <option value="January">Jan</option>
                                                    <option value="February">Feb</option>
                                                    <option value="March">Mar/option>
                                                    <option value="April">Apr</option>
                                                    <option value="May">May</option>
                                                    <option value="June">Jun</option>
                                                    <option value="July">Jul</option>
                                                    <option value="August" selected>Aug</option>
                                                    <option value="September">Sep</option>
                                                    <option value="October">Oct</option>
                                                    <option value="November">Nov</option>
                                                    <option value="December">Dec</option>
                                              </select>
                                              <select class="drop">
                                                    <option value="Year">Year</option>                                                
                                                    <option value="1990">1990</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1997" selected>1997</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1999">1999</option>
                                                    <option value="2000">2000</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2006">2006</option>
                                              </select>


                                    </td>
                                </tr>
                                <tr style="background-color:#e0f4fc">
                                        <td colspan="2" class="gender">Gender</td>  
                                    </tr>
                                    <tr style="background-color:#e0f4fc;font-size: 20px;font-weight: bold">
                                        <td colspan="2"><input class="txtbox1" type="radio" name="login" value="male" > Male
                                            <input  class="txtbox1" type="radio" name="login" value="female" > Female
                                            <input class="txtbox1" type="radio" name="login" value="custom" > Custom </td>
                                    </tr>
                                                
                                        
                                <tr style="background-color:#e0f4fc">
                                    <td colspan="2" style="font-size:15px;color:gray">
                                            By clicking Sign Up, you agree to our <a href="www.facebook.com">Terms, Data Policy</a>Terms, Data Policy and <a href="www.facebook.com">Cookie Policy</a>.<br> You may receive SMS notifications from us and can opt out at any time.
                                    </td>
                                </tr>
                                <tr style="background-color:#e0f4fc" >
                                    <td colspan="2">
                                            
                                            <input class="pointer" type="button" name="login" value="SignUp" ></div>
                                        </td>
                                    
                                </tr>
                                <tr style="background-color:#e0f4fc">
                                    <td colspan="2">
                                            <a href="www.facebook.com">Create a Page</a> for a celebrity, band or business.
                                    </td>
                                </tr>
                                <tr >
                                    <td colspan="4" style="text-align: center">
                                            <a href="www.facebook.com">English (UK)</a>
                                            <a href="www.facebook.com">සිංහල</a>
                                            <a href="www.facebook.com">தமிழ்</a>
                                            <a href="www.facebook.com">Español</a>
                                            <a href="www.facebook.com">Deutsch</a>
                                            <a href="www.facebook.com">Italiano</a>
                                            <a href="www.facebook.com">Français (France)</a>
                                            <a href="www.facebook.com">Português (Brasil)</a>
                                            <a href="www.facebook.com">日本語</a>                                   
                                            <a href="www.facebook.com">हिन्दी</a>
                                            <input type="button" name="login" value="+">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4"><hr></td>
                                </tr>
                                
                                <tr >
                                    <td>

                                    </td>
                                </tr>
                    </table>
            </table>
        </form>
        
            
            
    </body>
</html>