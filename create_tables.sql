  --CREATING PROJETOS TABLE
CREATE TABLE
  public.projetos (
    id serial NOT NULL,
    name character varying(255) NOT NULL,
    description text NULL,
    start_date date NULL,
    end_date date NULL,
    status character varying(255) NULL,
    priority character varying(255) NULL,
    user_id integer NULL
  );

ALTER TABLE
  public.projetos
ADD
  CONSTRAINT projetos_pkey PRIMARY KEY (id);


--CREATING TASKS TABLE
CREATE TABLE
  public.tasks (
    id serial NOT NULL,
    task_name character varying(255) NOT NULL,
    task_description text NULL,
    project_id integer NULL,
    completed boolean NULL DEFAULT false,
    created_at timestamp without time zone NULL DEFAULT CURRENT_TIMESTAMP
  );

ALTER TABLE
  public.tasks
ADD
  CONSTRAINT tasks_pkey PRIMARY KEY (id);


--CREATING USERS TABLE 
CREATE TABLE
  public.users (
    id serial NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    created_at timestamp without time zone NULL DEFAULT CURRENT_TIMESTAMP
  );

ALTER TABLE
  public.users
ADD
  CONSTRAINT users_pkey PRIMARY KEY (id);