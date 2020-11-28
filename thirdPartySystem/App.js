import React, { useState, useEffect } from "react";
import Task from "./Task";

const App = () => {
  const API_URL = `http://yii2advanced:82/task`;

  const [tasks, setTasks] = useState([]);
  useEffect(() => {
    loadData();
  }, []);

  const loadData = async () => {
    const response = await fetch(API_URL); // запрашиваем данные о задачах
    const data = await response.json();
    setTasks(data); // записываем данные в массив
  };

  return (
    <div className="App">
      {tasks.map(task => (
        <Task
          key={task.id}
          task={...task}
        />
      ))}
    </div>
  );
};

export default App;
