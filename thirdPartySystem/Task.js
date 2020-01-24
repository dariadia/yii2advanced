import React from "react";

const Task = ({ task }) => {
  return (
    <div>
      <h2>Title: {task.title}</h2>
      <p>Author: {task.author_id}</p>
      <p>Executor: {task.executor_id}</p>
      <p>Template?: {task.is_template}</p>
    </div>
  );
};

export default Task;
