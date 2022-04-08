[Home](../../README.md)
- [Slot machine work flow](Slotemachine-Work-Flow.md)
- [SlotMachine Controller](Slotmachine.md)
- [ScriptJs](scriptjs.md)

# Common Js

This Js file is used to change the behaviour of the elements showing in the fronend.


## Events: 
1. On the Clicking of shuffle Button:
```swift
    $(".startBtn").click(function() {
     const myInterval = setInterval(updateTime, 500);
     .........
    }
```

2. On the Clicking of Cash Out Button:
```swift
     $('#cashoutBtn').click(function() {
           ......          
     }
```

3. On Hovering of Cash Out Button:
```swift
       $('#cashoutBtn').hover(function() {
        var FiftyPERCENT = 0.50; // 50% chance
        var FortyPERCENT = 0.40; // 50% chance
           ......          
     }
```




































