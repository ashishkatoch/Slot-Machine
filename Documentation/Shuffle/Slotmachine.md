[Home](../README.md)
- [Slot machine functionality](Slotemachine-Work-Flow.md)
- [SlotMachine](Slotmachine.md)
- [ScriptJs](scriptjs.md)

# Sliders Controller


This controller is used to add remove credits based on the given conditions

## Class:
```swift
Slotmachine
```

## Functions:

`public function index()` 
<br/>
This method is used to initialize 10 credits to guest user.
<br/><br/> 


`public function getBlocksImage()` 
<br/>
This method is used to get the random signs based on the conditions.
Steps:

1. If `credits` is less than 40 then it will generate truly random output:
```swift
    if($credits<40){
        ......
    }
```
2. If `credits` is between 40 and 60 then 30% chance to re roll if sign are coming same :
```swift
   }else if($credits>=40 || $credits<=60 ){
        ......
    }
```

3. If `credits` is greater than 60 then 60% chance to re roll if sign are coming same :
```swift
    }else if($credits>60){
        ......
    }
```
<br/><br/>

`public function getCreditsByItem($item){` 
<br/>
This method is used to retreive the credit values based on the sign/item.
<br/><br/> 
 
