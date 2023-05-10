export default function send(res, statusCode=200, data=null, desc=null) {
  return res.status(statusCode).json({data, desc});
};
