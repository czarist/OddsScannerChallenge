-- First challenge

SELECT first_name, last_name, department_id
FROM employees
WHERE department_id IN (30, 100)
ORDER BY  department_id  ASC;

-- Second challenge

SELECT manager_id, MIN(salary)
FROM employees
WHERE manager_id IS NOT NULL
GROUP BY manager_id
ORDER BY MIN(salary) DESC;

-- Third challenge

SELECT first_name, last_name, salary 
FROM employees 
WHERE salary > (SELECT salary FROM employees WHERE last_name = 'Bell') 
ORDER BY first_name ASC;

-- Fourth challenge

SELECT e.first_name, e.last_name, e.job_id, e.department_id, d.department_name 
FROM employees e 
JOIN departments d 
ON (e.department_id = d.department_id) 
JOIN locations l ON 
(d.location_id = l.location_id) 
WHERE LOWER(l.city) = 'London'
ORDER BY e.job_id ASC;

-- Fifth Challenge

SELECT department_name AS 'department', 
COUNT(*) AS 'employers no' 
FROM departments 
INNER JOIN employees 
ON employees.department_id = departments.department_id 
GROUP BY departments.department_id, department_name 
ORDER BY department_name ASC;